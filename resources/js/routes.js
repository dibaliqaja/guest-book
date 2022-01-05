import GuestbookIndex from "./components/guests/Index.vue"
import GuestbookCreate from "./components/guests/Create.vue"
import GuestbookEdit from "./components/guests/Edit.vue"

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
]