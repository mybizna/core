<template>
    <edit-render :path_param="['core', 'country']" :model="model">
        <div class="row">
            <div class="col-md-6">

                <FormKit v-model="model.id" label="Id" id="id" type="hidden" validation="required" />
                <FormKit v-model="model.name" label="Name" id="name" type="text" validation="required" />
                <FormKit v-model="model.code" label="Code" id="code" type="text" :readonly="true" validation="required" />
                <FormKit v-model="model.code3" label="Code3" id="code3" type="text" :readonly="true"
                    validation="required" />

            </div>
            <div class="col-md-6">
                <FormKit v-model="model.latitude" label="Latitude" id="latitude" type="text" :readonly="true"
                    validation="required" />
                <FormKit v-model="model.longitude" label="Longitude" id="longitude" type="text" :readonly="true"
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
                code: "",
                unused: "",
                system: "",
            },

        };
    }
};
</script>
