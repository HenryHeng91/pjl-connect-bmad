import { mount } from '@vue/test-utils';
import Form from './Form.vue';
import { describe, it, expect, vi } from 'vitest';

// Mock Inertia's useForm
vi.mock('@inertiajs/vue3', () => ({
    useForm: (data) => {
        return {
            ...data,
            post: vi.fn(),
            put: vi.fn(),
            errors: {},
        };
    },
}));

describe('Form.vue', () => {
    it('submits the form with the correct data for creating a service', async () => {
        const carriers = [
            { id: 1, name: 'Carrier A' },
        ];

        const wrapper = mount(Form, {
            props: { carriers },
        });

        await wrapper.find('#name').setValue('New Service');
        await wrapper.find('#description').setValue('New Desc');
        await wrapper.find('#price').setValue(123);

        await wrapper.find('form').trigger('submit.prevent');

        const form = wrapper.vm.form;
        expect(form.post).toHaveBeenCalledWith('/services');
    });
});
