
from kedro.pipeline import Pipeline, node

from .nodes import survival_breakdown


def create_pipeline(**kwargs):
    return Pipeline(
        [
            node(
                survival_breakdown,
                inputs="titanic_training_data",
                outputs="survival_breakdown_chart",
            )
        ]
    )
