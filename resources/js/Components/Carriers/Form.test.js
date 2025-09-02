import { vi, expect, test } from 'vitest';

vi.mock('@inertiajs/vue3', () => ({
  router: {
    post: vi.fn(),
    put: vi.fn(),
  },
}));

import { mount } from '@vue/test-utils';
import Form from './Form.vue';
import { router } from '@inertiajs/vue3';

test('shows validation error when company name missing', async () => {
  const wrapper = mount(Form);
  await wrapper.find('form').trigger('submit.prevent');
  expect(wrapper.text()).toContain('Company name is required');
});

test('submits form data', async () => {
  const wrapper = mount(Form);
  await wrapper.find('input[name="company_name"]').setValue('Acme');
  await wrapper.find('form').trigger('submit.prevent');
  expect(router.post).toHaveBeenCalledWith('/carriers', expect.objectContaining({ company_name: 'Acme' }));
});
