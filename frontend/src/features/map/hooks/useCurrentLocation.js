"use client";

import { useEffect, useState } from "react";
import {
  getCurrentPosition,
  watchPosition,
  clearWatcher,
} from "@/infrastructure/geolocation/browserLocation";

export default function useCurrentLocation() {
  const [location, setLocation] = useState(null);

  const [loading, setLoading] = useState(true);

  const [error, setError] = useState(null);

  useEffect(() => {
    let watchId = null;

    async function initialize() {
      try {
        const position = await getCurrentPosition();

        setLocation({
          latitude: position.coords.latitude,
          longitude: position.coords.longitude,
          accuracy: position.coords.accuracy,
        });

        watchId = watchPosition((position) => {
          setLocation({
            latitude: position.coords.latitude,
            longitude: position.coords.longitude,
            accuracy: position.coords.accuracy,
          });
        }, setError);
      } catch (err) {
        setError(err);
      } finally {
        setLoading(false);
      }
    }

    initialize();

    return () => {
      if (watchId !== null) {
        clearWatcher(watchId);
      }
    };
  }, []);

  return {
    location,
    loading,
    error,
  };
}
