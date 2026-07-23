"use client";

import { Button } from "@/components/ui/button";

export default function BottomSheet({
    station,
    onClose,
}) {
    if (!station) return null;

    return (
        <div
            className="
                absolute
                bottom-0
                left-0
                right-0
                z-[1000]
                rounded-t-3xl
                border
                bg-background
                p-6
                shadow-2xl
            "
        >
            <div className="mx-auto mb-5 h-1.5 w-14 rounded-full bg-muted" />

            <h2 className="text-xl font-bold">
                {station.name}
            </h2>

            <p className="mt-2 text-sm text-muted-foreground">
                {station.address}
            </p>

            {station.operator && (
                <p className="mt-3 text-sm">
                    Operator:
                    {" "}
                    <strong>
                        {station.operator.name}
                    </strong>
                </p>
            )}

            {station.distance && (
                <p className="mt-2 text-sm text-emerald-600">
                    {Number(station.distance).toFixed(1)} km away
                </p>
            )}

            <div className="mt-6 flex gap-3">
                <Button
                    className="flex-1"
                    onClick={() => {
                        const url =
                            `https://www.google.com/maps/dir/?api=1&destination=${station.latitude},${station.longitude}`;

                        window.open(url, "_blank");
                    }}
                >
                    Navigate
                </Button>

                <Button
                    variant="outline"
                    onClick={onClose}
                >
                    Close
                </Button>
            </div>
        </div>
    );
}