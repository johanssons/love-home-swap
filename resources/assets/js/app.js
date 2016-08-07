import $ from 'jquery';
import 'foundation';

import Foundation from './Foundation';

class App {
    constructor() {
        this.init();
    }

    init() {
        this.initComponents();
    }

    initComponents() {
       new Foundation();
    }
}

new App();