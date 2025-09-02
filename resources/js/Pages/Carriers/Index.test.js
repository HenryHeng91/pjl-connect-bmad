import { mount } from '@vue/test-utils';
import { expect, test, vi } from 'vitest';
import Index from './Index.vue';

vi.mock('@inertiajs/vue3', () => ({
  Head: { template: '<div><slot /></div>' },
  router: { delete: vi.fn() },
}));

test('lists carriers', () => {
  const carriers = [
    { id: 1, company_name: 'Carrier A', contact_person: 'Alice' },
    { id: 2, company_name: 'Carrier B', contact_person: 'Bob' },
  ];
  const wrapper = mount(Index, {
    props: { carriers },
    global: { stubs: { Form: { template: '<div></div>' } } },
  });
  expect(wrapper.text()).toContain('Carrier A');
  expect(wrapper.text()).toContain('Carrier B');
});
