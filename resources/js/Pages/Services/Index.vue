<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    services: Array,
});
</script>

<template>
    <div>
        <h1>Services</h1>
        <Link href="/services/create">Create Service</Link>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="service in services" :key="service.id">
                    <td>{{ service.name }}</td>
                    <td>{{ service.description }}</td>
                    <td>{{ service.price }}</td>
                    <td>
                        <Link :href="`/services/${service.id}/edit`">Edit</Link>
                        <Link :href="`/services/${service.id}`" method="delete" as="button" type="button" :onBefore="() => confirm('Are you sure?')">Delete</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>