
from typing import Any, Dict, Iterable, Optional

from kedro.config import ConfigLoader
from kedro.framework.hooks import hook_impl
from kedro.io import DataCatalog
from kedro.pipeline import Pipeline
from kedro.versioning import Journal



from src.kit.pipelines import (
    hello_world,
    survival_breakdown,
    gender_survival_breakdown,
    unet_mammogram_mask_prediction,
    breast_density_prediction,
    pathology_calc_prediction,
    pathology_mass_prediction,
    swin_cascade_rcnn_mammogram_mask_prediction,
    swin_mask_rcnn_mammogram_mask_prediction,
    swin_faster_rcnn_mammogram_mask_prediction
)


class ProjectHooks:
    @hook_impl
    def register_pipelines(self) -> Dict[str, Pipeline]:
        """Register the project's pipeline.

        Returns:
            A mapping from a pipeline name to a ``Pipeline`` object.

        """
        return {
            "unet-mammogram-mask-prediction": unet_mammogram_mask_prediction.create_pipeline(),
            "swin-cascade-rcnn-mammogram-mask-prediction": swin_cascade_rcnn_mammogram_mask_prediction.create_pipeline(),
            "swin-mask-rcnn-mammogram-mask-prediction": swin_mask_rcnn_mammogram_mask_prediction.create_pipeline(),
            "swin-faster-rcnn-mammogram-mask-prediction": swin_faster_rcnn_mammogram_mask_prediction.create_pipeline(),
            "survival-breakdown": survival_breakdown.create_pipeline(),
            "gender-survival-breakdown": gender_survival_breakdown.create_pipeline(),
            "hello-world": hello_world.create_pipeline(),
            "breast-density-prediction": breast_density_prediction.create_pipeline(),
            "pathology-calc-prediction": pathology_calc_prediction.create_pipeline(),
            "pathology-mass-prediction": pathology_mass_prediction.create_pipeline(),
            "__default__": Pipeline(
                [

                    unet_mammogram_mask_prediction.create_pipeline()
                    + swin_cascade_rcnn_mammogram_mask_prediction.create_pipeline()
                    + pathology_mass_prediction.create_pipeline()
                    + swin_mask_rcnn_mammogram_mask_prediction.create_pipeline()
                    + swin_faster_rcnn_mammogram_mask_prediction.create_pipeline()
                    + pathology_calc_prediction.create_pipeline()
                    + breast_density_prediction.create_pipeline()
                ]
            ),
        }

    @hook_impl
    def register_config_loader(self, conf_paths: Iterable[str]) -> ConfigLoader:
        return ConfigLoader(conf_paths)

    @hook_impl
    def register_catalog(
        self,
        catalog: Optional[Dict[str, Dict[str, Any]]],
        credentials: Dict[str, Dict[str, Any]],
        load_versions: Dict[str, str],
        save_version: str,
        journal: Journal,
    ) -> DataCatalog:
        return DataCatalog.from_config(
            catalog, credentials, load_versions, save_version, journal
        )


project_hooks = ProjectHooks()
