<template>
    <edit-render :path_param="['core', 'language_translation']" :model="model">
        <div class="row">
            <div class="col-md-6">
                <FormKit v-model="model.id" label="Id" id="id" type="hidden" :readonly="true" validation="required" />
                <FormKit v-model="model.slug" label="Slug" id="slug" type="text" validation="required" />
                <FormKit v-model="model.phrase" label="Phrase" id="phrase" type="text" validation="required" />
                <FormKit label="Language" button_label="Select Language" id="language_id" type="recordpicker"
                    comp_url="core/admin/language/list.vue" :setting="setting.language_id" v-model="model.language_id"
                    validation="required" inner-class="$reset formkit-inner" wrapper-class="$reset formkit-wrapper" />

            </div>
        </div>
    </edit-render>
</template>

<script>
export default {
    data() {
        return {
            id: null,
            model: {
                id: "",
                slug: "",
                language_id: "",
                phrase: "",
            },

        };
    }
};
</script>
