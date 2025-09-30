<template>
    <form @submit.prevent="submit">
        <div>
            <label for="name">Name</label>
            <input type="text" v-model="form.name" id="name">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea v-model="form.description" id="description"></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" v-model="form.price" id="price">
        </div>

        <h3>Carrier Costs</h3>
        <div v-for="(carrierCost, index) in form.carrier_costs" :key="index">
            <select v-model="carrierCost.carrier_id">
                <option v-for="carrier in carriers" :key="carrier.id" :value="carrier.id">{{ carrier.name }}</option>
            </select>
            <input type="number" v-model="carrierCost.cost">
            <button type="button" @click="removeCarrierCost(index)">Remove</button>
        </div>
        <button type="button" @click="addCarrierCost">Add Carrier Cost</button>

        <button type="submit">Save</button>
    </form>
</template>

<script setup>
import { reactive, defineProps } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    service: Object,
    carriers: Array,
});

const form = useForm({
    name: props.service?.name || '',
    description: props.service?.description || '',
    price: props.service?.price || 0,
    carrier_costs: props.service?.carrier_costs || [],
});

function addCarrierCost() {
    form.carrier_costs.push({ carrier_id: ' ', cost: 0 });
}

function removeCarrierCost(index) {
    form.carrier_costs.splice(index, 1);
}

function submit() {
    if (props.service) {
        form.put(`/services/${props.service.id}`);
    } else {
        form.post('/services');
    }
}
</script>