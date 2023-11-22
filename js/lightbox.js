

/**
 * @property {HTMLElement} element
 * @property {string[]} images Chemins des images de la lightbox
 * @property {string} url image actuellement affichée
 */

class Lightbox {
    
    static init (){
        const links = Array.from(document.querySelectorAll('a[href$=".png"], a[href$=".jpg"], a[href$=".jpeg"]'))
        const gallery = links.map(link=>link.getAttribute('href'))
        
        links.forEach(link => link.addEventListener('click', e=>
        {   
            if (document.querySelector('.lightbox')) {console.log('lightbox existe dejà')
            }else{
            console.log(link)
            e.preventDefault()
            new Lightbox(e.currentTarget.getAttribute('href'), gallery)
            }
        }))  
        
    }


    /**
     * 
     * @param {string} url URL de l'image
     * @param {string[]} images Chemins des images de la lightbox
     */
    constructor (url, images) {
        this.element = this.buildDom(url)
        this.images = images
        this.loadImage(url)
        document.body.appendChild(this.element)
        this.onKeyUp = this.onKeyUp.bind(this)
        document.addEventListener('keyup', this.onKeyUp)
    }

     /**
     * 
     * @param {string} url URL de l'image
     */
    loadImage(url){
        this.url = null
        const image = new Image()
        const container = this.element.querySelector('.lightbox__container')
        const loader = document.createElement('div')
        loader.classList.add('lightbox__loader')
        container.innerHTML = ''
        container.appendChild(loader)
        image.onload = ()=>{
            container.removeChild(loader)
            container.appendChild(image)
            this.url = url
        }
        image.src = url
    }

    /**
     * 
     * @param {KeyboardEvent} e 
     */
    onKeyUp (e){
        if (e.key == 'Escape'){
            this.close(e)
        }else if (e.key == 'ArrowLeft'){
            this.prev(e)
        }else if (e.key == 'ArrowRight'){
            this.next(e)
        }
    }

    /**
     * Ferme la lightbox
     * @param {MouseEvent / KeyboardEvent} e
     */
    close(e){
        e.preventDefault()
        this.element.classList.add('fade-out')
        window.setTimeout(()=>{
            this.element.parentElement.removeChild(this.element)
        }, 500)
        document.removeEventListener('keyup', this.onKeyUp)
    }

    /**
     * Photo suivante
     * @param {MouseEvent / KeyboardEvent} e
     */
    next(e){
        e.preventDefault()
        let i = this.images.findIndex(image => image === this.url)
        if (i === this.images.length - 1) {
            i = -1
        }
        this.loadImage(this.images[i + 1])
    }

    /**
     * Photo précédente
     * @param {MouseEvent / KeyboardEvent} e
     */
    prev(e){
        e.preventDefault()
        let i = this.images.findIndex(image => image === this.url)
        if (i === 0) {
            i = this.images.length 
        }
        this.loadImage(this.images[i - 1])
    }

    /**
     * 
     * @param {string} url URL de l'image
     * @return {HTMLElement}
     */
    buildDom (url) {
        const dom = document.createElement('div')
        dom.classList.add('lightbox')   
        dom.innerHTML = `
            <div class="lightbox__close"></div>
            <div class="lightbox__prev"><div class="arrow"></div>Précédent</div>
            <div class="lightbox__container">                               
            </div>
            <div class="lightbox__next">Suivant<div class="arrow"></div></div>
            <div class="infos">
                <div class="ref-div"><?php echo $reference; ?></div>
                <div class="cat-div"><?php echo $categorie; ?></div>
            </div>`
        dom.querySelector('.lightbox__close').addEventListener('click', this.close.bind(this))
        dom.querySelector('.lightbox__next').addEventListener('click', this.next.bind(this))
        dom.querySelector('.lightbox__prev').addEventListener('click', this.prev.bind(this))
        return dom
    }

}

Lightbox.init()

const globalContainer = document.getElementById('global-catalogue-container')
if (globalContainer){
    
    globalContainer.addEventListener('mouseover', event=>{
        console.log('container mouse over')
        Lightbox.init()
        console.log('lance nouvelle Lightbox')
    })
}





