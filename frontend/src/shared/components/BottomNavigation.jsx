"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";

import { USER_NAVIGATION } from "@/config/navigation";

export default function BottomNavigation() {
  const pathname = usePathname();

  return (
    <nav
      className="
        fixed
        bottom-0
        left-0
        right-0
        z-50
        border-t
        bg-background/95
        backdrop-blur-lg
      "
    >
      <div
        className="
          mx-auto
          flex
          max-w-md
          items-center
          justify-around
          py-3
        "
      >
        {USER_NAVIGATION.map((item) => {
          const Icon = item.icon;

          const active = pathname === item.href;

          return (
            <Link
              key={item.id}
              href={item.href}
              className="
                flex
                flex-col
                items-center
                gap-1
              "
            >
              <Icon
                className={
                  active
                    ? "h-5 w-5 text-emerald-500"
                    : "h-5 w-5 text-muted-foreground"
                }
              />

              <span
                className={
                  active
                    ? "text-xs font-medium text-emerald-500"
                    : "text-xs text-muted-foreground"
                }
              >
                {item.label}
              </span>
            </Link>
          );
        })}
      </div>
    </nav>
  );
}