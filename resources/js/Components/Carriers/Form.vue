<template>
  <form @submit.prevent="submit" class="space-y-4">
    <div>
      <label class="block">Company Name</label>
      <input name="company_name" v-model="form.company_name" class="border" />
      <div v-if="form.errors.company_name" class="text-red-500">{{ form.errors.company_name }}</div>
    </div>
    <div>
      <label class="block">Contact Person</label>
      <input name="contact_person" v-model="form.contact_person" class="border" />
    </div>
    <div>
      <label class="block">Phone Number</label>
      <input name="phone_number" v-model="form.phone_number" class="border" />
    </div>
    <div>
      <label class="block">Email</label>
      <input name="email" v-model="form.email" class="border" />
    </div>
    <div>
      <label class="block">Cost Details</label>
      <textarea name="cost_details" v-model="form.cost_details" class="border" />
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2">
      {{ props.carrier ? 'Update' : 'Create' }}
    </button>
  </form>
</template>

<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  carrier: { type: Object, default: null },
});

const form = reactive({
  company_name: props.carrier?.company_name || '',
  contact_person: props.carrier?.contact_person || '',
  phone_number: props.carrier?.phone_number || '',
  email: props.carrier?.email || '',
  cost_details: props.carrier?.cost_details || '',
  errors: {},
});

function submit() {
  form.errors = {};
  if (!form.company_name) {
    form.errors.company_name = 'Company name is required';
    return;
  }

  if (props.carrier) {
    router.put(`/carriers/${props.carrier.id}`, form);
  } else {
    router.post('/carriers', form);
  }
}
</script>
