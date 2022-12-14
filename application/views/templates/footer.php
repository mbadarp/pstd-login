   <!-- Footer -->
   <footer class="content-footer footer bg-footer-theme">
       <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
           <div class="mb-2 mb-md-0">
               ©
               Pamungkas Studio
               <script>
                   document.write(new Date().getFullYear());
               </script>
           </div>
           <div>

               <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>
           </div>
       </div>
   </footer>
   <!-- / Footer -->

   <div class="content-backdrop fade"></div>
   </div>
   <!-- Content wrapper -->
   </div>
   <!-- / Layout page -->
   </div>

   <!-- Overlay -->
   <div class="layout-overlay layout-menu-toggle"></div>
   </div>
   <!-- / Layout wrapper -->



   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="<?= base_url('assets/') ?>assets/vendor/libs/jquery/jquery.js"></script>
   <script src="<?= base_url('assets/') ?>assets/vendor/libs/popper/popper.js"></script>
   <script src="<?= base_url('assets/') ?>assets/vendor/js/bootstrap.js"></script>
   <script src="<?= base_url('assets/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

   <script src="<?= base_url('assets/') ?>assets/vendor/js/menu.js"></script>
   <script src="<?= base_url('assets/') ?>js/jquery-3.6.1.min.js"></script>
   <!-- endbuild -->

   <!-- ajax access role -->
   <script>
       $('.form-check-input').on('click', function() {
           const menuId = $(this).data('menu');
           const roleId = $(this).data('role');

           $.ajax({
               url: "<?= base_url('admin/change_access'); ?>",
               type: 'post',
               data: {
                   menuId: menuId,
                   roleId: roleId
               },

               success: function() {
                   document.location.href = "<?= base_url('admin/roleaccess/') ?>" + roleId;
               }
           });
       })
   </script>

   <!-- Vendors JS -->

   <!-- Main JS -->
   <script src="<?= base_url('assets/') ?>assets/js/main.js"></script>

   <!-- Page JS -->

   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
   </body>

   </html>