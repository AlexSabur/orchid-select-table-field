export default class {

    /**
     * @type {HTMLInputElement}
     */
    _element

    /**
     * 
     * @param {HTMLInputElement} element 
     */
    constructor (element) {
        this._element = element
    }

    add(value) {
        this._value = this._set.add(value)
    }

    remove(value) {
        this._value = this._set.delete(value)
    }

    has(value) {
        return this._set.has(value)
    }

    change() {
        this._element.dispatchEvent(new Event('change'))
    }

    get _set() {
        return new Set(this._element.value.split(',').map(id => id.trim()))
    }

    set _value(data) {
        try {
            this._element.value = Array.from(data).join(', ')
        } catch (error) {
            this._element = ''
        } finally {
            this.change()
        }
    }
}