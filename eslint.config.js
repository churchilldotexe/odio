import pluginTailwindCSS from 'eslint-plugin-tailwindcss';
import eslint from '@eslint/js';
import eslintConfigPrettier from 'eslint-config-prettier';
import eslintPluginVue from 'eslint-plugin-vue';
import globals from 'globals';
import typescriptEslint from 'typescript-eslint';

export default typescriptEslint.config(
    { ignores: ['*.d.ts', '**/coverage', '**/dist'] },
    {
        extends: [
            eslint.configs.recommended,
            ...typescriptEslint.configs.recommended,
            ...eslintPluginVue.configs['flat/strongly-recommended'],
            ...pluginTailwindCSS.configs['flat/recommended'],
        ],
        files: ['**/*.{ts,vue}'],
        languageOptions: {
            ecmaVersion: 'latest',
            sourceType: 'module',
            globals: globals.browser,
            parserOptions: {
                parser: typescriptEslint.parser,
            },
        },
        rules: {
            // your rules
            // Disable the multi-word component name rule
            'vue/multi-word-component-names': 'off',

            // Disable the linebreak before attribute rule
            // 'vue/max-attributes-per-line': 'off',
            'vue/first-attribute-linebreak': 'off',
        },
    },
    eslintConfigPrettier
);
