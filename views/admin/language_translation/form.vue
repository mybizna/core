<template>
    <edit-render :path_param="['core', 'language_translation']" :model="model">
        <div class="row">
            <div class="col-md-6">
                <FormKit v-model="model.id" label="Id" id="id" type="hidden" :readonly="true" validation="required" />
                <FormKit v-model="model.slug" label="Slug" id="slug" type="text" validation="required" />
                <FormKit v-model="model.language" label="Language" id="language" type="text" validation="required" />
                <FormKit v-model="model.phrase" label="Phrase" id="phrase" type="text" validation="required" />
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
                model: "",
                phrase: "",
            },

        };
    }
};
</script>
