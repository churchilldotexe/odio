import { InjectionKey, Ref } from 'vue';

export const cartModal = Symbol() as InjectionKey<{
    isModalOpen: Ref<boolean, boolean>;
    handleModalToggle: () => void;
}>;

export const navModal = Symbol() as InjectionKey<{
    isModalOpen: Ref<boolean, boolean>;
    handleModalToggle: () => void;
}>;
