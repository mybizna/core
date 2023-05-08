<template>
    <edit-render :path_param="['core', 'language']" :model="model">
        <div class="row">
            <div class="col-md-6">
                <FormKit v-model="model.id" label="Id" id="id" type="hidden" :readonly="true" validation="required" />
                <FormKit v-model="model.name" label="Name" id="name" type="text" :readonly="true"
                    validation="required" />
                <FormKit v-model="model.slug" label="Slug" id="slug" type="text" :readonly="true"
                    validation="required" />
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
                name: "",
                slug: "",
            },

        };
    }
};
</script>
