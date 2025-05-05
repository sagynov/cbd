import './bootstrap';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'

Alpine.plugin(persist);

window.Alpine = Alpine;


Alpine.store('cart', {
    items:  Alpine.$persist([]).as('cart'),

    addItem(item) {
        if (this.items.find(i => i.id == item.id)) {
            if (!('quantity' in item)){
                this.items.find(i => i.id == item.id).quantity++;
            }else{
                this.items.find(i => i.id == item.id).quantity += item.quantity;
            }
        } else {
            if (!('quantity' in item)){
                item.quantity = 1;
            }
            this.items.push(item);
        }
    },
    removeItem(item) {
        this.items = this.items.filter(i => i.id !== item.id);
    },
    getTotal() {
        return this.items.reduce((total, item) => total + item.price * item.quantity, 0);
    },
    getCount() {
        return this.items.reduce((count, item) => count + item.quantity, 0);
    },
});

Alpine.start();

