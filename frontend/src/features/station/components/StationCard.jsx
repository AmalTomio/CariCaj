"use client";

import { Card, CardContent } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";

import {
  MapPinned,
  Navigation,
  Zap,
} from "lucide-react";

export default function StationCard({
  station,
  loading = false,
  onClick,
}) {
  if (loading) {
    return (
      <Card className="rounded-2xl">
        <CardContent className="space-y-4 animate-pulse p-5">
          <div className="h-5 w-48 rounded bg-muted" />
          <div className="h-4 w-32 rounded bg-muted" />
          <div className="h-4 w-full rounded bg-muted" />
          <div className="flex gap-2">
            <div className="h-7 w-20 rounded bg-muted" />
            <div className="h-7 w-20 rounded bg-muted" />
          </div>
        </CardContent>
      </Card>
    );
  }

  const navigate = () => {
    window.open(
      `https://www.google.com/maps/search/?api=1&query=${station.latitude},${station.longitude}`,
      "_blank"
    );
  };

  const statusColor = {
    active: "bg-green-500",
    maintenance: "bg-yellow-500",
    inactive: "bg-red-500",
  };

  return (
    <Card
      onClick={onClick}
      className="
        cursor-pointer
        rounded-2xl
        transition-all
        hover:border-emerald-500
        hover:shadow-lg
      "
    >
      <CardContent className="space-y-4 p-5">
        <div className="flex items-start justify-between">
          <div>
            <h3 className="text-lg font-semibold">
              {station.name}
            </h3>

            <p className="text-sm text-muted-foreground">
              {station.operator?.name ?? "Unknown Operator"}
            </p>
          </div>

          <Badge className={statusColor[station.status]}>
            {station.status.charAt(0).toUpperCase() +
              station.status.slice(1)}
          </Badge>
        </div>

        <div className="flex items-center gap-2 text-sm text-muted-foreground">
          <MapPinned className="h-4 w-4" />

          {station.distance != null
            ? `${station.distance} km away`
            : `${station.city}, ${station.state}`}
        </div>

        <div className="flex items-center gap-2 text-sm text-muted-foreground">
          <Zap className="h-4 w-4 text-emerald-500" />

          {station.total_connectors > 0
            ? `${station.available_connectors} / ${station.total_connectors} Available`
            : "No connector information"}
        </div>

        <button
          onClick={(e) => {
            e.stopPropagation();
            navigate();
          }}
          className="
            flex
            w-full
            items-center
            justify-center
            gap-2
            rounded-xl
            bg-emerald-500
            py-2
            text-white
            transition
            hover:bg-emerald-600
          "
        >
          <Navigation className="h-4 w-4" />
          Navigate
        </button>
      </CardContent>
    </Card>
  );
}