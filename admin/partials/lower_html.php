    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js"></script>
    <script>
        try {
            function populateEditForm(faskes) {
                document.getElementById('edit_id').value = faskes.id;
                document.getElementById('edit_nama').value = faskes.nama;
                document.getElementById('edit_kategori').value = faskes.kategori;
                document.getElementById('edit_alamat').value = faskes.alamat;
                document.getElementById('edit_telepon').value = faskes.telepon;
                document.getElementById('edit_layanan').value = faskes.layanan;
                document.getElementById('edit_latitude').value = faskes.latitude;
                document.getElementById('edit_longitude').value = faskes.longitude;
            }
        } catch (error) {
            console.log(error)
        }
    </script>
</body>
</html>
