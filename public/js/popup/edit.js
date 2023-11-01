const triggeredit = document.querySelector('#trigger-edit-user');
const modalWrapperedit = document.querySelector('.modal-edit-wrapper');
const closeBtnedit = document.querySelector('.close-popup-edit');
const closeAjaedit = document.querySelector('.close-edit');

      triggeredit.addEventListener('click', function() {
        openModalEdit();
      });

      closeAjaedit.addEventListener('click', function() {
        closeModalEdit();
      });

      closeBtnedit.addEventListener('click', function() {
        closeModalEdit();
      });

      modalWrapperedit.addEventListener('click', function(e) {
        if (e.target !== this) return;
        closeModalEdit();
      });

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          closeModalEdit();
        }
      })

      function openModalEdit() {
        modalWrapperedit.classList.add('active-popup-edit');
      }

      function closeModalEdit() {
        modalWrapperedit.classList.remove('active-popup-edit');
      }
