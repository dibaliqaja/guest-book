import GuestbookIndex from "./components/guests/Index.vue"
import GuestbookCreate from "./components/guests/Create.vue"
import GuestbookEdit from "./components/guests/Edit.vue"
import GuestbookFrontIndex from "./components/front/Index.vue"
import GuestbookFrontCreate from "./components/front/Create.vue"

export const routes = [
    {
        path: "/guests",
        name: "GuestbookIndex",
        component: GuestbookIndex
    },
    {
        path: "/guests/create",
        name: "GuestbookCreate",
        component: GuestbookCreate
    },
    {
        path: "/guests/:id",
        name: "GuestbookEdit",
        component: GuestbookEdit
    },
    {
        path: "/",
        name: "GuestbookFrontIndex",
        component: GuestbookFrontIndex
    },
    {
        path: "/create",
        name: "GuestbookFrontCreate",
        component: GuestbookFrontCreate
    },
]