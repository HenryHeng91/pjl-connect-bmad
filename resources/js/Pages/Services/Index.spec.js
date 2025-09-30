import { mount } from '@vue/test-utils';
import Index from './Index.vue';
import { describe, it, expect } from 'vitest';
import { Link } from '@inertiajs/vue3';

describe('Index.vue', () => {
    it('renders a list of services', () => {
        const services = [
            { id: 1, name: 'Service 1', description: 'Desc 1', price: 10 },
            { id: 2, name: 'Service 2', description: 'Desc 2', price: 20 },
        ];

        const wrapper = mount(Index, {
            props: { services },
            global: {
                components: {
                    Link,
                }
            }
        });

        expect(wrapper.text()).toContain('Service 1');
        expect(wrapper.text()).toContain('Service 2');
    });
});
