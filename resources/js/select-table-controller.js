import InputSource from './source/input'
import SelectSource from './source/select'

export default class extends window.Controller {
    static targets = [
        'input',
        'turbo',
        'row',
        'check',
    ]

    connect() {
        
    }

    checkAll(event) {}
    
    checkPage(event) {}
    
    uncheckAll(event) {}
    
    uncheckPage(event) {}

    /**
     * @param {HTMLInputElement} target 
     */
    checkTargetConnected(target) {}

    checkToggle({params}) {

    }
    
    /**
     * @param {HTMLInputElement} target 
     */
    checkTargetDisconnected(target) {}
        
    /**
     * @param {HTMLElement} target 
     */
     rowTargetConnected(target) {
        target.querySelectorAll('a, button, form').forEach(element => {
            if (!element.hasAttribute('data-turbo-frame')) {
                element.setAttribute('data-turbo-frame', '_top')
            }
        })
    }
}
