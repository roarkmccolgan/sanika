import $ from 'jquery';
import 'slick-carousel';

window.$ = window.jQuery = $;

export const Slick = {
    name: 'Slick',
    props: {
        options: { type: Object, default: () => ({}) },
    },
    template: '<div><slot /></div>',
    mounted() {
        this.$nextTick(() => $(this.$el).slick(this.options));
    },
    beforeUnmount() {
        if ($(this.$el).hasClass('slick-initialized')) {
            $(this.$el).slick('unslick');
        }
    },
    methods: {
        next() { $(this.$el).slick('slickNext'); },
        prev() { $(this.$el).slick('slickPrev'); },
        reSlick() { $(this.$el).slick('setPosition'); },
    },
};

export const Tabs = {
    name: 'Tabs',
    data: () => ({ tabs: [], activeTab: null }),
    provide() {
        return { tabsRoot: this };
    },
    methods: {
        register(tab) {
            this.tabs.push(tab);
            this.activeTab ??= tab.name;
        },
    },
    template: `
        <div class="tabs-component">
            <ul class="tabs-component-tabs">
                <li v-for="tab in tabs" :key="tab.name" class="tabs-component-tab" :class="{'is-active': activeTab === tab.name}">
                    <button type="button" class="tabs-component-tab-a" @click="activeTab = tab.name">{{ tab.name }}</button>
                </li>
            </ul>
            <div class="tabs-component-panels"><slot /></div>
        </div>
    `,
};

export const Tab = {
    name: 'Tab',
    inject: ['tabsRoot'],
    props: { name: { type: String, required: true } },
    mounted() { this.tabsRoot.register(this); },
    template: '<section v-show="tabsRoot.activeTab === name" class="tabs-component-panel"><slot /></section>',
};

export const VueTyper = {
    name: 'VueTyper',
    props: { text: { type: Array, default: () => [] } },
    data: () => ({ index: 0, timer: null }),
    computed: {
        current() { return this.text[this.index] ?? ''; },
    },
    mounted() {
        this.$emit('typed', this.current);
        this.timer = window.setInterval(() => {
            this.index = (this.index + 1) % this.text.length;
            this.$emit('typed', this.current);
        }, 2500);
    },
    beforeUnmount() { window.clearInterval(this.timer); },
    template: '<span>{{ current }}</span>',
};
