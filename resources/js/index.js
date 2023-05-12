import axios from 'axios';

const grid = $('#gridContainer');

$(function() {
  grid.dxDataGrid({
    dataSource: {
      store: new DevExpress.data.CustomStore({
        key: "id",
        load: async (loadOptions) => {
          return await axios.get('/api/kangaroo')
        },
        remove: (key) => {
          Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then(async (result) => {
            if (result.isConfirmed) {
              const result = await axios.delete(`api/delete-data/${key}`);
              if (result.status < 300) {
                Swal.fire({
                  icon: 'success',
                  title: 'Kangaroo data successfully updated!',
                  showConfirmButton: false,
                  timer: 2000
                })
                grid.dxDataGrid('instance').getDataSource().reload();
            
                return
              }
              Swal.fire({
                title: 'Error!',
                text: 'Server error',
                icon: 'error',
                confirmButtonText: 'Ok'
              })
            }
          });
        }
    }),
      select: 'data'
    },
    columns: [
      { dataField: 'id', caption: 'ID' },
      { dataField: 'name', caption: 'Name' },
      { dataField: 'nickname', caption: 'Nickname' },
      { dataField: 'weight', caption: 'Weight' },
      { dataField: 'height', caption: 'Height' },
      { dataField: 'gender', caption: 'Gender' },
      { dataField: 'color', caption: 'Color' },
      { dataField: 'friendliness', caption: 'Friendliness' },
      { dataField: 'birthday', caption: 'Birthday' }
    ],
    allowColumnReordering: true,
    columnChooser: {
      enabled: true
    },
    allowColumnResizing: true,
    filterRow: {
      visible: true
    },
    searchPanel: {
      visible: true
    },
    sorting: {
      mode: 'multiple'
    },
    pager: {
      showPageSizeSelector: true,
      allowedPageSizes: [5, 10, 20, 'all'],
      showInfo: true,
      showNavigationButtons: true,
      visible: true
    },
    editing: {
      allowDeleting: true,
      confirmDelete: false
    }
  });
});