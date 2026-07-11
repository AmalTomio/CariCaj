"use client";

import BottomNavigation from "@/shared/components/BottomNavigation";

export default function AppLayout({ children }) {
  return (
    <div className="min-h-screen bg-background">
      <main className="pb-24">{children}</main>

      <BottomNavigation />
    </div>
  );
}
