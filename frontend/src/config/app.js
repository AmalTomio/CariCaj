export const APP_CONFIG = {
  name: process.env.NEXT_PUBLIC_APP_NAME,

  apiUrl: process.env.NEXT_PUBLIC_API_URL,

  map: {
    defaultLat: Number(process.env.NEXT_PUBLIC_MAP_DEFAULT_LAT),
    defaultLng: Number(process.env.NEXT_PUBLIC_MAP_DEFAULT_LNG),
    radius: Number(process.env.NEXT_PUBLIC_SEARCH_RADIUS),
  },
};
