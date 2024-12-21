import { InjectionKey, Ref } from 'vue';

export const modal = Symbol() as InjectionKey<{
    isModalOpen: Ref<boolean, boolean>;
    handleModalToggle: () => void;
}>;
