"use client";

import { MapPinned } from "lucide-react";

export default function HomeHero() {
  return (
    <section className="flex items-center justify-between">
      <div>
        <h1 className="text-3xl font-bold tracking-tight">
          CariCaj
        </h1>

        <p className="mt-1 text-sm text-muted-foreground">
          Charge smarter. Drive further.
        </p>
      </div>

      <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-500/10">
        <MapPinned className="h-7 w-7 text-emerald-500" />
      </div>
    </section>
  );
}