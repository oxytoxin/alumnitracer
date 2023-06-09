import Alpine from 'alpinejs'
import Focus from '@alpinejs/focus'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'
import Collapse from '@alpinejs/collapse'
import Mousetrap from '@danharrin/alpine-mousetrap'
import Persist from '@alpinejs/persist'
import Tooltip from '@ryangjchandler/alpine-tooltip'

Alpine.plugin(Focus)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(NotificationsAlpinePlugin)
Alpine.plugin(Collapse)
Alpine.plugin(Focus)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(Mousetrap)
Alpine.plugin(NotificationsAlpinePlugin)
Alpine.plugin(Persist)
Alpine.plugin(Tooltip)



Alpine.store('sidebar', {
    isOpen: Alpine.$persist(true).as('isOpen'),

    collapsedGroups: Alpine.$persist(null).as('collapsedGroups'),

    groupIsCollapsed: function (group) {
        return this.collapsedGroups.includes(group)
    },

    collapseGroup: function (group) {
        if (this.collapsedGroups.includes(group)) {
            return
        }

        this.collapsedGroups = this.collapsedGroups.concat(group)
    },

    toggleCollapsedGroup: function (group) {
        this.collapsedGroups = this.collapsedGroups.includes(group)
            ? this.collapsedGroups.filter(
                (collapsedGroup) => collapsedGroup !== group,
            )
            : this.collapsedGroups.concat(group)
    },

    close: function () {
        this.isOpen = false
    },

    open: function () {
        this.isOpen = true
    },
})

Alpine.store(
    'theme',
    window.matchMedia('(prefers-color-scheme: dark)').matches
        ? 'dark'
        : 'light',
)

window.addEventListener('dark-mode-toggled', (event) => {
    Alpine.store('theme', event.detail)
})

window
    .matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', (event) => {
        Alpine.store('theme', event.matches ? 'dark' : 'light')
    })

window.Alpine = Alpine

Alpine.start()
