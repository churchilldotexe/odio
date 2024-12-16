import antfu from '@antfu/eslint-config';
import pluginTailwindCSS from 'eslint-plugin-tailwindcss';

export default antfu({
  stylistic: {
    indent: 2,
    quotes: 'single',
    semi: true,
    overrides: {
      'style/comma-dangle': 'error',
      'style/max-statements-per-line': 'off'
    }
  },

  vue: {
    overrides: {
      'vue/block-order': ['error', { order: ['script', 'template', 'style'] }],
      'vue/v-slot-style': ['error', {
        atComponent: 'shorthand',
        default: 'shorthand',
        named: 'shorthand'
      }],
      'vue/singleline-html-element-content-newline': 'off',
      'vue/custom-event-name-casing': ['error', 'camelCase'],
      'vue/multi-word-component-names': 'off',
      'vue/require-default-prop': 'off',
      'vue/no-v-html': 'off',
      'vue/component-name-in-template-casing': ['error', 'PascalCase'],
      'vue/v-on-event-hyphenation': 'off',
      'vue/first-attribute-linebreak': ['error', { singleline: 'beside', multiline: 'below' }],
      'vue/max-attributes-per-line': ['error', {
        singleline: {
          max: 3
        },
        multiline: {
          max: 1
        }
      }]
    }
  },

  ignores: ['node_modules', 'dist', 'dts']

}, {
  plugins: { tailwindcss: pluginTailwindCSS },
  rules: {
    ...pluginTailwindCSS.configs.recommended.rules,
    'tailwindcss/no-custom-classname': 'off',

    'max-len': ['off', {
      code: 120,
      ignoreComments: true,
      ignoreTrailingComments: true,
      ignoreUrls: true,
      ignoreStrings: true,
      ignoreRegExpLiterals: true
    }],
    'no-restricted-syntax': 'off',
    'import/order': 'off',
    'unused-imports/no-unused-imports': 'off',
    'antfu/if-newline': 'off'
  }
});
