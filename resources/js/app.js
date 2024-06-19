import './bootstrap';
import 'flowbite';

// Livewire powergrid
import './../../vendor/power-components/livewire-powergrid/dist/powergrid';
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css';

// Tom select
import TomSelect from "tom-select";
import { initFlowbite } from 'flowbite';
window.TomSelect = TomSelect;

// wire:navigate issue
document.addEventListener('livewire:navigated', () => {
    initFlowbite();
})

