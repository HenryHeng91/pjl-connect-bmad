import { mount } from '@vue/test-utils';
import { expect, test, vi } from 'vitest';
import Login from './Login.vue';
import { Head } from '@inertiajs/vue3';

// Mock the Head component from Inertia
vi.mock('@inertiajs/vue3', () => ({
  Head: {
    template: '<div><slot /></div>',
  },
}));

test('Telegram login widget script and div are present', async () => {
  const wrapper = mount(Login, {
    attachTo: document.body,
    global: {
      stubs: {
        Head: Head,
      },
      mocks: {
        $page: {
          props: {
            errors: {},
          },
        },
      },
    },
  });

  // Wait for the script to be appended
  await vi.dynamicImportSettled();

  // Check if the div for the Telegram widget is present
  expect(wrapper.find('#telegram-login-pjlconnect_bot').exists()).toBe(true);

  // Check if the script tag is present and has the correct attributes
  const scriptTag = document.querySelector('script[data-telegram-login="pjlconnect_bot"]');
  expect(scriptTag).not.toBeNull();
  expect(scriptTag.src).toContain('https://telegram.org/js/telegram-widget.js');
  expect(scriptTag.getAttribute('data-size')).toBe('large');
  expect(scriptTag.getAttribute('data-auth-url')).toBe('/login/telegram/callback');

  wrapper.unmount();
});

test('Error message is displayed', async () => {
  const wrapper = mount(Login, {
    attachTo: document.body,
    global: {
      stubs: {
        Head: Head,
      },
      mocks: {
        $page: {
          props: {
            errors: {
              telegram: 'Authentication failed.',
            },
          },
        },
      },
    },
  });

  expect(wrapper.text()).toContain('Authentication failed.');

  wrapper.unmount();
});