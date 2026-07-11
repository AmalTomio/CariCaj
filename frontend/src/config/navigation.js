import { House, Map, Search, Users, User } from "lucide-react";

import { ROUTES } from "./routes";

export const USER_NAVIGATION = [
  {
    id: "home",
    label: "Home",
    href: ROUTES.HOME,
    icon: House,
  },
  {
    id: "map",
    label: "Map",
    href: ROUTES.MAP,
    icon: Map,
  },
  {
    id: "search",
    label: "Search",
    href: ROUTES.SEARCH,
    icon: Search,
  },
  {
    id: "community",
    label: "Community",
    href: ROUTES.COMMUNITY,
    icon: Users,
  },
  {
    id: "profile",
    label: "Profile",
    href: ROUTES.PROFILE,
    icon: User,
  },
];
