<template>
    <edit-render :path_param="['core', 'setting']" :model="model">
        <div class="row">
            <div class="col-md-6">
                <FormKit v-model="model.id" label="Id" id="id" type="hidden" :readonly="true" validation="required" />
                <FormKit v-model="model.module" label="Module" id="module" type="text" :readonly="true"
                    validation="required" />
                <FormKit v-model="model.model" label="Model" id="model" type="text" :readonly="true"
                    validation="required" />
                <FormKit v-model="model.name" label="Name" id="name" type="text" :readonly="true" validation="required" />
                <FormKit v-model="model.type" label="Type" id="type" type="text" :readonly="true" validation="required" />
                <FormKit v-model="model.value" label="Value" id="value" type="text" validation="required" />
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
                module: "",
                model: "",
                name: "",
                type: "",
                value: "",
            },

        };
    }
};
</script>
