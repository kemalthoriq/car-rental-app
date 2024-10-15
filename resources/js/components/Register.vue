<template>
    <div>
      <h2>Registrasi Pengguna</h2>
      <form @submit.prevent="register">
        <input v-model="name" placeholder="Nama" required />
        <input v-model="address" placeholder="Alamat" required />
        <input v-model="phone" placeholder="Telepon" required />
        <input v-model="driver_license" placeholder="Nomor SIM" required />
        <button type="submit">Daftar</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        address: '',
        phone: '',
        driver_license: '',
      };
    },
    methods: {
      register() {
        axios.post('/api/register', {
          name: this.name,
          address: this.address,
          phone: this.phone,
          driver_license: this.driver_license,
        })
        .then(response => {
          alert('Pendaftaran berhasil!');
        })
        .catch(error => {
          console.error(error);
          alert('Terjadi kesalahan saat mendaftar.');
        });
      }
    }
  };
  </script>
  