export const APP_CONFIG = {
  app: {
    name: process.env.NEXT_PUBLIC_APP_NAME || "CariCaj",
    version: "0.1.0",
    environment: process.env.NODE_ENV,
  },

  api: {
    baseUrl: process.env.NEXT_PUBLIC_API_URL,
    timeout: 15000,
  },

  map: {
    defaultCenter: {
      lat: Number(process.env.NEXT_PUBLIC_MAP_DEFAULT_LAT),
      lng: Number(process.env.NEXT_PUBLIC_MAP_DEFAULT_LNG),
    },

    searchRadius: Number(process.env.NEXT_PUBLIC_SEARCH_RADIUS) || 25,

    defaultZoom: 14,

    minZoom: 5,

    maxZoom: 18,
  },
};
