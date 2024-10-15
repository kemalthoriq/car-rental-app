<template>
    <div>
      <h2>Daftar Mobil</h2>
      <ul>
        <li v-for="car in cars" :key="car.id">
          {{ car.brand }} - {{ car.model }} - {{ car.plate_number }} - {{ car.rental_price_per_day }} per hari
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        cars: [],
      };
    },
    created() {
      this.fetchCars();
    },
    methods: {
      fetchCars() {
        axios.get('/api/cars')
          .then(response => {
            this.cars = response.data;
          })
          .catch(error => {
            console.error('Error fetching cars:', error);
          });
      }
    }
  };
  </script>
  