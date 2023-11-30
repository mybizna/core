<template>
    <edit-render :path_param="['core', 'setting']" :model="model" passed_form_url="setting/savedata">

        <Vueform :model-value="model" :sync="true">

            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <template v-for="(setting, sk) in model.settings" v-bind:key="sk">
                        <button :class="sk == current_tab ? 'nav-link active' : 'nav-link'" :id="'v-pills-' + sk + '-tab'"
                            data-bs-toggle="tab" :data-bs-target="'#v-pills-' + + sk" type="button" role="tab"
                            :aria-controls="sk" :aria-selected="!sk ? 'true' : 'false'" @click="current_tab = sk">
                            {{
                                setting.title
                            }}</button>
                    </template>
                </div>
                <div class="tab-content w-3/4" id="v-pills-tabContent">
                    <div v-for="(setting, sk) in model.settings" v-bind:key="sk"
                        :class="sk == current_tab ? 'tab-pane fade show active' : 'tab-pane fade'" :id="sk" role="tabpanel"
                        :aria-labelledby="sk + '-tab'">
                        <div class="p-2">
                            <div v-for="(subsetting, ck) in setting.settings" v-bind:key="ck">
                                <h3 class="my-3 border-b-2 border-indigo-200 ">{{ subsetting.title }}</h3>
                                <template v-for="(field, ssl_index) in subsetting.list" v-bind:key="ssl_index">

                                    <TextareaElement v-if="field.params.type == 'textarea'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <EditorElement v-else-if="field.params.type == 'editor'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <CheckboxElement v-else-if="field.params.type == 'checkbox'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <CheckboxgroupElement v-else-if="field.params.type == 'checkboxgroup'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :items="field.params.options" />

                                    <RadioElement v-else-if="field.params.type == 'radio'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <RadiogroupElement v-else-if="field.params.type == 'radiogroup'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :items="field.params.options" />

                                    <ToggleElement
                                        v-else-if="field.params.type == 'toggle' || field.params.type == 'switch'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :default="field.value" :true-value="1" :false-value="0" />

                                    <SelectElement v-else-if="field.params.type == 'select'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :items="field.params.options" />

                                    <MultiselectElement v-else-if="field.params.type == 'multiselect'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :items="field.params.options" />

                                    <TagsElement v-else-if="field.params.type == 'tags'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :items="field.params.options" />

                                    <DateElement v-else-if="field.params.type == 'date'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <DatesElement v-else-if="field.params.type == 'dates'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <SliderElement v-else-if="field.params.type == 'slider'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <FileElement v-else-if="field.params.type == 'file'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <MultifileElement v-else-if="field.params.type == 'multifile'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <LocationElement v-else-if="field.params.type == 'location'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <HiddenElement v-else-if="field.params.type == 'hidden'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <StaticElement v-else-if="field.params.type == 'static'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info" />

                                    <RecordpickerElement v-else-if="field.params.type == 'recordpicker'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :valdata="model[sk + '__' + ck + '__' + field.name]"
                                        :setting="field.params.setting" />

                                    <DropzoneElement v-else-if="field.params.type == 'dropzone'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :valdata="model[sk + '__' + ck + '__' + field.name]" />

                                    <FaceElement v-else-if="field.params.type == 'face'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :valdata="model[sk + '__' + ck + '__' + field.name]" />

                                    <MediaElement v-else-if="field.params.type == 'media'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :valdata="model[sk + '__' + ck + '__' + field.name]" />

                                    <MonthpickerElement v-else-if="field.params.type == 'monthpicker'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :valdata="model[sk + '__' + ck + '__' + field.name]" />

                                    <RecordselectElement v-else-if="field.params.type == 'recordselect'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :valdata="model[sk + '__' + ck + '__' + field.name]" />

                                    <WeekpickerElement v-else-if="field.params.type == 'weekpicker'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :valdata="model[sk + '__' + ck + '__' + field.name]" />

                                    <YearpickerElement v-else-if="field.params.type == 'yearpicker'"
                                        :name="sk + '__' + ck + '__' + field.name" :label="field.params.title"
                                        :id="sk + '__' + ck + '__' + field.name" :placeholder="field.params.title"
                                        :description="field.params.description" :info="field.params.info"
                                        :valdata="model[sk + '__' + ck + '__' + field.name]" />

                                    <TextElement v-else :name="sk + '__' + ck + '__' + field.name"
                                        :label="field.params.title" :id="sk + '__' + ck + '__' + field.name"
                                        :placeholder="field.params.title" :description="field.params.description"
                                        :info="field.params.info" />

                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </Vueform>
    </edit-render>
</template>

<script>
export default {
    data() {
        return {
            current_tab: 'core',
            model: { settings: {} },
            mdata: {}
        }
    },
    created() {
        this.fetchData();
    },

    methods: {
        getNow: function () {

        },
        fetchData() {

            var t = this;
            var comp_url = 'fetch_settings/';

            const getdata = async (t) => {

                await window.axios.get(comp_url)
                    .then(
                        response => {
                            t.model.settings = response.data;

                            var arr_tabs = Object.keys(t.model.settings);

                            for (const sk in t.model.settings) {
                                if (t.model.settings.hasOwnProperty(sk)) {
                                    let sdata = t.model.settings[sk];
                                    for (const ck in sdata.settings) {
                                        if (sdata.settings.hasOwnProperty(ck)) {
                                            let list = sdata.settings[ck].list;

                                            for (const lk in list) {
                                                let lkdata = list[lk];
                                                t.model[sk + '__' + ck + '__' + lkdata.name] = lkdata.params.value;
                                            }
                                        }
                                    }
                                }
                            }

                            t.current_tab = arr_tabs[0];
                        });
            };

            getdata(this);
        },
    }
};
</script>