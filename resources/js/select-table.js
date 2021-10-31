import TableController from './table-controller';

if (typeof window.application !== 'undefined') {
    window.application.register('select-table', TableController);
}
