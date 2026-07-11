"use client";

import { Input } from "@/components/ui/input";
import { Search, MapPinned, Map, Zap } from "lucide-react";

export default function SearchSection() {
  return (
    <section className="space-y-5">
      <div className="relative">
        <Search className="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-muted-foreground" />

        <Input
          type="text"
          placeholder="Search charging station or location..."
          className="h-12 rounded-xl pl-11 text-sm"
        />
      </div>

      <div className="grid grid-cols-3 gap-3">
        <button
          className="
            flex flex-col items-center justify-center
            gap-2
            rounded-2xl
            border
            bg-card
            p-5
            transition-all
            hover:border-emerald-500
            hover:bg-muted
          "
        >
          <MapPinned className="h-6 w-6 text-emerald-500" />

          <span className="text-sm font-medium">Nearby</span>
        </button>

        <button
          className="
            flex flex-col items-center justify-center
            gap-2
            rounded-2xl
            border
            bg-card
            p-5
            transition-all
            hover:border-emerald-500
            hover:bg-muted
          "
        >
          <Map className="h-6 w-6 text-sky-500" />

          <span className="text-sm font-medium">Explore</span>
        </button>

        <button
          className="
            flex flex-col items-center justify-center
            gap-2
            rounded-2xl
            border
            bg-card
            p-5
            transition-all
            hover:border-emerald-500
            hover:bg-muted
          "
        >
          <Zap className="h-6 w-6 text-yellow-500" />

          <span className="text-sm font-medium">Fast DC</span>
        </button>
      </div>
    </section>
  );
}
