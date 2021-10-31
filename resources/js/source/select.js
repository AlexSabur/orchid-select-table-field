export default class {

    /**
     * @type {HTMLSelectElement}
     */
    _element
    
   /**
    * 
    * @param {HTMLSelectElement} element 
    */ 
    constructor (element) {
        this._element = element
    }

    add(value) {
        if (this.has(value)) {
            return;
        }

        const option = document.createElement("option");

        option.value = value
        option.textContent = value
        option.selected = true

        this._element.add(option)

        this.change()
    }

    remove(value) {
        const option = this._element.querySelector(`[value="${value}"]`)

        if (option) {
            this._element.remove(option.index)

            this.change()
        }
    }

    has(value) {
        return !!this._element.querySelector(`[value="${value}"]`)
    }

    change() {
        this._element.dispatchEvent(new Event('change'))
    }
}