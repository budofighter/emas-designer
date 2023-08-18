import Vue from 'vue';
import draggable from 'vuedraggable';

new Vue({
    el: '#app',
    components: {
        draggable
    },
    data: {
        list: [], // Liste der hinzugefügten Elemente
        selectedElement: null // Das aktuell ausgewählte Element
    },
    methods: {
        exportToJson() {
            // Logik zum Exportieren der Daten als JSON
        }
    }
});
