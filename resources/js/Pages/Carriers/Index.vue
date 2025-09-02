<template>
  <Head title="Carriers" />
  <div class="p-4">
    <h1 class="text-2xl mb-4">Carriers</h1>
    <Form :carrier="editingCarrier" />
    <table class="mt-4 w-full" v-if="carriers.length">
      <thead>
        <tr>
          <th class="text-left">Company</th>
          <th class="text-left">Contact</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="carrier in carriers" :key="carrier.id" class="border-t">
          <td>{{ carrier.company_name }}</td>
          <td>{{ carrier.contact_person }}</td>
          <td class="space-x-2">
            <button class="text-blue-500" @click="editCarrier(carrier)">Edit</button>
            <button class="text-red-500" @click="deleteCarrier(carrier)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import Form from '../../Components/Carriers/Form.vue';

const props = defineProps({
  carriers: { type: Array, default: () => [] },
});

const editingCarrier = ref(null);

function editCarrier(carrier) {
  editingCarrier.value = carrier;
}

function deleteCarrier(carrier) {
  router.delete(`/carriers/${carrier.id}`);
}
</script>
