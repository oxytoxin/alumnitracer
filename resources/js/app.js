import Alpine from "alpinejs";
import Focus from "@alpinejs/focus";
import FormsAlpinePlugin from "../../vendor/filament/forms/dist/module.esm";
import NotificationsAlpinePlugin from "../../vendor/filament/notifications/dist/module.esm";
import Collapse from "@alpinejs/collapse";
import Mousetrap from "@danharrin/alpine-mousetrap";
import Persist from "@alpinejs/persist";
import Tooltip from "@ryangjchandler/alpine-tooltip";

Alpine.plugin(Focus);
Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(NotificationsAlpinePlugin);
Alpine.plugin(Collapse);
Alpine.plugin(Focus);
Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(Mousetrap);
Alpine.plugin(NotificationsAlpinePlugin);
Alpine.plugin(Persist);
Alpine.plugin(Tooltip);

Alpine.store("sidebar", {
    isOpen: Alpine.$persist(true).as("isOpen"),

    close: function () {
        this.isOpen = false;
    },

    open: function () {
        this.isOpen = true;
    },
});

Alpine.store(
    "theme",
    window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"
);

Alpine.data("darkmode", () => ({
    mode: null,
    theme: null,
    init: function () {
        this.theme =
            localStorage.getItem("theme") ||
            (this.isSystemDark() ? "dark" : "light");
        this.mode = localStorage.getItem("theme") ? "manual" : "auto";

        window
            .matchMedia("(prefers-color-scheme: dark)")
            .addEventListener("change", (event) => {
                if (this.mode === "manual") return;

                if (
                    event.matches &&
                    !document.documentElement.classList.contains("dark")
                ) {
                    this.theme = "dark";

                    document.documentElement.classList.add("dark");
                } else if (
                    !event.matches &&
                    document.documentElement.classList.contains("dark")
                ) {
                    this.theme = "light";

                    document.documentElement.classList.remove("dark");
                }
            });

        this.$watch("theme", () => {
            if (this.mode === "auto") return;

            localStorage.setItem("theme", this.theme);

            if (
                this.theme === "dark" &&
                !document.documentElement.classList.contains("dark")
            ) {
                document.documentElement.classList.add("dark");
            } else if (
                this.theme === "light" &&
                document.documentElement.classList.contains("dark")
            ) {
                document.documentElement.classList.remove("dark");
            }

            this.$dispatch("dark-mode-toggled", this.theme);
        });
    },

    isSystemDark: function () {
        return window.matchMedia("(prefers-color-scheme: dark)").matches;
    },
}));

window.addEventListener("dark-mode-toggled", (event) => {
    Alpine.store("theme", event.detail);
});

window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (event) => {
        Alpine.store("theme", event.matches ? "dark" : "light");
    });

window.printOut = function (data, title, csspath) {
    var mywindow = window.open("", title, "height=1000,width=1000");
    mywindow.document.write("<html><head>");
    mywindow.document.write("<title>" + title + "</title>");
    mywindow.document.write(`<link rel="stylesheet" href="` + csspath + `" />`);
    mywindow.document.write("</head><body >");
    mywindow.document.write(data);
    mywindow.document.write("</body></html>");
    mywindow.document.close();
    mywindow.focus();
    setTimeout(() => {
        mywindow.print();
    }, 1000);
    return false;
};

window.Alpine = Alpine;

Alpine.start();
