<template>
    <div>
        <h1>Create Service</h1>
        <Form :carriers="carriers" />
    </div>
</template>

<script setup>
import Form from '@/Components/Services/Form.vue';
import { defineProps } from 'vue';

defineProps({
    carriers: Array,
});

</script>
